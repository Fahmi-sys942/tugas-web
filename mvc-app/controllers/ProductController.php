<?php
class ProductController {
    private $db;
    private $productModel;
    
    public function __construct($db) {
        $this->db = $db;
        $this->productModel = new Product($db);
    }
    
    public function index() {
        requireLogin();
        
        $search = $_GET['search'] ?? null;
        $productList = $this->productModel->getAllProducts($search);
        $page = 'products';
        
        require_once 'views/layouts/header.php';
        require_once 'views/products/index.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function create() {
        requireLogin();
        if (!isAdmin()) {
            $_SESSION['error'] = 'Anda tidak memiliki akses ke halaman ini';
            redirect('products');
        }
        
        $page = 'products';
        require_once 'views/layouts/header.php';
        require_once 'views/products/create.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function store() {
        requireLogin();
        if (!isAdmin()) {
            $_SESSION['error'] = 'Anda tidak memiliki akses';
            redirect('products');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            
            if (empty($name) || empty($price)) {
                $_SESSION['error'] = 'Semua field harus diisi';
                redirect('products&action=create');
            }
            
            $this->productModel->createProduct($name, (float)$price);
            $_SESSION['success'] = 'Product berhasil ditambahkan';
            redirect('products');
        }
    }
    
    public function edit() {
        requireLogin();
        if (!isAdmin()) {
            $_SESSION['error'] = 'Anda tidak memiliki akses';
            redirect('products');
        }
        
        $id = $_GET['id'] ?? null;
        $product = $this->productModel->getProductById($id);
        
        if (!$product) {
            $_SESSION['error'] = 'Product tidak ditemukan';
            redirect('products');
        }
        
        $page = 'products';
        require_once 'views/layouts/header.php';
        require_once 'views/products/edit.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function update() {
        requireLogin();
        if (!isAdmin()) {
            $_SESSION['error'] = 'Anda tidak memiliki akses';
            redirect('products');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            
            if (empty($id) || empty($name) || empty($price)) {
                $_SESSION['error'] = 'Semua field harus diisi';
                redirect('products&action=edit&id=' . $id);
            }
            
            $this->productModel->updateProduct($id, $name, (float)$price);
            $_SESSION['success'] = 'Product berhasil diupdate';
            redirect('products');
        }
    }
    
    public function delete() {
        requireLogin();
        if (!isAdmin()) {
            $_SESSION['error'] = 'Anda tidak memiliki akses';
            redirect('products');
        }
        
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            $this->productModel->deleteProduct($id);
            $_SESSION['success'] = 'Product berhasil dihapus';
        }
        
        redirect('products');
    }
}
?>