<?php
class Product {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getProducts($page, $per_page, $search = '') {
        $start_from = ($page - 1) * $per_page;
        
        $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image 
                FROM products 
                WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'
                LIMIT $per_page OFFSET $start_from";
        
        $result = $this->connection->query($sql);
        return $result;
    }

    public function searchProducts($search, $per_page, $start_from) {
        $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image
                FROM products 
                WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'
                LIMIT $per_page OFFSET $start_from";
    
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getTotalRecords() {
        $sql = "SELECT COUNT(id) FROM products";
        $result = $this->connection->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    // Tambah Product
    public function tambahProduct($product_name, $category_id, $product_code, $description, $price, $stock, $images) {
        $imagesJson = json_encode($images);
    
        $sql = "INSERT INTO products (product_name, category_id, product_code, description, price, stock, image) 
                VALUES ('$product_name', '$category_id', '$product_code', '$description', '$price', '$stock', '$imagesJson')";
    
        return $this->connection->query($sql);
    }
    
    // Edit Product
    public function editProduct($product_id, $product_name, $category_id, $product_code, $description, $price, $stock, $new_images) {
        // Inisialisasi array untuk menyimpan nama file gambar baru
        $new_images_array = [];
    
        // Loop dari gambar yang diunggah
        if (!empty($new_images['name'][0])) {
            $total_images = count($new_images['name']);
            for ($i = 0; $i < $total_images; $i++) {
                $new_image_name = $new_images['name'][$i];
                $file_tmp = $new_images['tmp_name'][$i];
                $target_path = "../dist/upload/" . $new_image_name;
    
                if (move_uploaded_file($file_tmp, $target_path)) {
                    $new_images_array[] = $new_image_name;
                }
            }
        }
    
        // Mengganti gambar produk jika ada yang diunggah
        if (!empty($new_images_array)) {
            // Konversi array gambar baru ke JSON
            $new_images_json = json_encode($new_images_array);
    
            $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_code='$product_code', description='$description', price='$price', stock='$stock', image='$new_images_json' WHERE id='$product_id'";
        } else {
            $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_code='$product_code', description='$description', price='$price', stock='$stock' WHERE id='$product_id'";
        }
    
        return $this->connection->query($sql);
    }

        // Delete Product
        public function deleteProduct($product_id) {
            // Query untuk menghapus produk berdasarkan 'id'
            $sql = "DELETE FROM products WHERE id = $product_id";
        
            if ($this->connection->query($sql) === true) {
                return true; // Berhasil dihapus
            } else {
                return false; // Gagal dihapus
            }
        }
}