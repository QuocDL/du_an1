<?php 
// Hàm phân trang ở trang sản phẩm mới
function selectAll_news_product_phantrang($sortDescending, $start, $limit,$product_status)
{
    $sql = "SELECT * FROM products WHERE product_status = ? ORDER BY product_id " . ($sortDescending ? "DESC" : "ASC") . " LIMIT $start, $limit";
    return pdo_query($sql,$product_status);
}
// Hàm chọn tất cả sản phẩm
function selectAll_product($sortDescending,$product_status)
{
    $sql = "SELECT * FROM products WHERE product_status = ? ORDER BY product_id " . ($sortDescending ? "DESC" : "ASC");
    return pdo_query($sql,$product_status);
}
function select_all_size()
{
    $sql = "SELECT * FROM size ORDER BY size_id ";
    return pdo_query($sql);
}
// hàm đếm tất cả sản phẩm mới
function count_allnews_products($product_status)
{
    $sql = "SELECT COUNT(*) FROM products WHERE product_status = ?";
    return pdo_query_value($sql,$product_status);
}

// Hàm chọn tất cả màu sắc
function select_all_color()
{
    $sql = "SELECT * FROM color_type ORDER BY color_type_id ";
    return pdo_query($sql);
}
// hàm đếm tổng sản phẩm(truyền vào danh mục)
function count_all_products($category_id)
{
    $sql = "SELECT COUNT(*) FROM products WHERE category_id = ?";
    return pdo_query_value($sql,$category_id);
}
// hàm chọn sản phẩm
function select_home_product($sortDescending, $category_id)
{
    $sql = "SELECT * FROM products WHERE category_id = ? ORDER BY product_id " . ($sortDescending ? "DESC" : "ASC") . " LIMIT 8";
    return pdo_query($sql, $category_id);
}
// hảm chọn màu sản phẩm
function select_product_color($product_code)
{
$sql = "SELECT color_name.*,product_color.* FROM products JOIN product_color ON products.product_id = product_color.product_id 
        JOIN color_name ON product_color.color_name_id = color_name.color_name_id WHERE products.product_code = ?";
    return pdo_query($sql, $product_code);
}
// hàm phân trang sản phẩm
function selectAll_product_phantrang($category_id, $sortDescending, $start, $limit)
{
    $sql = "SELECT * FROM products WHERE category_id = ? ORDER BY product_id " . ($sortDescending ? "DESC" : "ASC") . " LIMIT $start, $limit";
    return pdo_query($sql, $category_id);
}
?>