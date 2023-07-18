<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function accessCheck() {
        if($this->session->userdata('status') == "login"){
            if($this->session->userdata('access') == "user") {
                redirect(base_url("User"));
            } else {
                return true;
            }
		}else{
			redirect(base_url("login"));
        }
    }

    public function index() {

        $this->accessCheck();

        redirect(base_url("Admin/products"));
    }

    public function products() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_subject('Product', 'Products')
            ->set_theme('datatables')
            ->set_table('products')
            ->columns('ProductID', 'ProductName', 'ProductPrice', 'ProductDescription', 'ProductImage', 'ProductQty', 'ProductDate', 'CategoriesID', 'SuppliersID')
            ->display_as('ProductID', 'ID')
            ->display_as('ProductName', 'Name')
            ->display_as('ProductPrice', 'Price')
            ->display_as('ProductDescription', 'Description')
            ->display_as('ProductImage', 'Image')
            ->display_as('ProductQty', 'Stock')
            ->display_as('ProductDate', 'Added Date')
            ->display_as('CategoriesID', 'Category')
            ->display_as('SuppliersID', 'Supplier')
            ->fields('ProductName', 'ProductPrice', 'ProductDescription', 'ProductImage', 'ProductQty', 'CategoriesID', 'SuppliersID')
            ->edit_fields('ProductName', 'ProductPrice', 'ProductDescription', 'ProductImage', 'ProductQty', 'CategoriesID', 'SuppliersID')
            ->set_read_fields('ProductID', 'ProductName', 'ProductPrice', 'ProductDescription', 'ProductImage', 'ProductQty', 'CategoriesID', 'SuppliersID')
            ->set_relation('CategoriesID', 'categories', 'CategoriesName')
            ->set_relation('SuppliersID', 'suppliers', 'SuppliersName')
            ->set_field_upload('ProductImage', 'assets/images/')
            ->callback_edit_field('ProductDescription', array($this, 'edit_desc'))
            ->callback_add_field('ProductDescription', array($this, 'add_desc'));

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/product', $data);
    }

    public function categories() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
            ->set_subject('Category', 'Categories')
            ->set_table('categories')
            ->columns('CategoriesID', 'CategoriesName')
            ->display_as('CategoriesID', 'Categories ID')
            ->display_as('CategoriesName', 'Categories Name')
            ->fields('CategoriesName')
            ->set_read_fields('CategoriesID', 'CategoriesName');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/category', $data);
    }

    public function suppliers() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
            ->set_subject('Supplier', 'Suppliers')
            ->set_table('suppliers')
            ->columns('SuppliersID', 'SuppliersName')
            ->display_as('SuppliersID', 'Suppliers ID')
            ->display_as('SuppliersName', 'Suppliers Name')
            ->fields('SuppliersName')
            ->set_read_fields('SuppliersID', 'SuppliersName');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/supplier', $data);
    }

    public function users() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
            ->set_subject('User', 'Users')
            ->set_table('customers')
            ->columns('CustomerID', 'first_name', 'last_name', 'email', 'birthdate', 'phone_number', 'gender', 'address', 'StatusID')
            ->display_as('UserID', 'ID')
            ->display_as('FirstName', 'First Name')
            ->display_as('LastName', 'Last Name')
            ->display_as('PhoneNumber', 'Phone Number')
            ->display_as('StatusID', 'Status')
            ->set_relation('StatusID', 'userstatus', 'StatusCode')
            ->fields('StatusID')
            ->set_read_fields('UserID', 'FirstName', 'LastName', 'Email', 'Birthdate', 'PhoneNumber', 'Gender', 'Address', 'StatusID')
            ->set_relation('StatusID', 'userstatus', 'StatusCode');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/users', $data);
    }

    public function orders() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
            ->set_subject('Order', 'Orders')
            ->set_table('transactions')
            ->columns('TransactionID', 'CustomerID', 'transactionValue', 'transactionDate', 'paymentMethod', 'transactionStatus', 'transactionReceipt')
            ->display_as('TransactionID', 'Transaction ID')
            ->display_as('CustomerID', 'Customer')
            ->set_relation('CustomerID', 'customers', 'first_name')
            ->display_as('transactionValue', 'Transaction Value')
            ->display_as('transactionDate', 'Transaction Date')
            ->display_as('paymentMethod', 'Payment Method')
            ->display_as('transactionStatus', 'Status')
            ->display_as('transactionReceipt', 'Receipt')
            ->fields('transactionReceipt', 'transactionStatus')
            ->set_read_fields('TransactionID', 'CustomerID', 'transactionValue', 'transactionDate', 'paymentMethod', 'transactionStatus', 'transactionReceipt');

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/orders', $data);
    }

    public function admins() {

        $this->accessCheck();

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables')
            ->set_subject('Admin', 'Admins')
            ->set_table('admins')
            ->columns('AdminID', 'Email', 'FirstName', 'LastName', 'StatusID', 'LevelID')
            ->display_as('AdminID', 'ID')
            ->display_as('FirstName', 'First Name')
            ->display_as('LastName', 'Last Name')
            ->display_as('StatusID', 'Status')
            ->set_relation('StatusID', 'userstatus', 'StatusCode')
            ->display_as('LevelID', 'Admin Level')
            ->set_relation('LevelID', 'adminlevels', 'LevelCode')
            ->fields('Email', 'FirstName', 'LastName', 'StatusID', 'LevelID')
            ->add_fields('Email', 'Password', 'FirstName', 'LastName', 'LevelID')
            ->set_read_fields('AdminID', 'Email', 'FirstName', 'LastName', 'StatusID', 'LevelID')
            ->set_relation('LevelID', 'adminlevels', 'LevelCode')
            ->change_field_type('Password', 'Password')
            ->callback_insert(array($this, 'hashing'));

        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
    
        $data['style'] = $this->load->view('include/grocery/style', $data, TRUE);
        $data['script'] = $this->load->view('include/grocery/script', $data, TRUE);
        $data['sidebarAdmin'] = $this->load->view('template/admin/sidebarAdmin', NULL, TRUE);
        $data['navbarAdmin'] = $this->load->view('template/admin/navbarAdmin', NULL, TRUE);

        $this->load->view('page/admin/admins', $data);
    }

    function hashing($post_array) {

        $this->accessCheck();

        $post_array['Password'] = password_hash($post_array['Password'], PASSWORD_BCRYPT);
        return $this->db->insert('admins', $post_array);
    }

    function edit_desc($value, $primary_key) {

        $this->accessCheck();

        return "<textarea name='ProductDescription'> $value </textarea> ";
    }

    function add_desc() {

        $this->accessCheck();

        return "<textarea name='ProductDescription'> </textarea> ";
    }

}