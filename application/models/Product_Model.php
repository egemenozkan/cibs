<?php

        class Product_Model extends CI_Model{

                var $productId = 0;
                var $product = "";
                var $description = "";
                var $ingredients = "";
                var $standards ="";
                var $consistency = "";
                var $package = "";
                var $parentProductId = 0;
                var $categoryId = 0;
                var $brandId = 0;

		         public function __construct()
		        {
		                // Call the CI_Model constructor
		                parent::__construct();
		        }

                function getProductsByParentId($parentId){
                        $query = $this->db->get_where('product_view',array("parent_product_id"=>$parentId));
                        return $query->result();

                }

                function getProductById($id){
                        if($id ==0)
                                return new product_model();
                        else{
                                $query = $this->db->get_where('product_view',array("product_id"=>$id));
                                $rows = $query->result();
                                return (count($rows)>0)?$rows[0]:null;
                        }
                }

                public function saveProduct($params)
                {
                        $query =$this->db->query("CALL save_product('{$params["product_id"]}','{$params["product"]}','{$params["description"]}','{$params["ingredients"]}','{$params["standards"]}','{$params["consistency"]}','{$params["packages"]}','{$params["parent_product"]}','{$params["category"]}','{$params["brand"]}');");
                        $result = $query->result();
                        return $result[0];
                }
                public function getCategoriesByBrandId($brandId){
                        $query = $this->db->get_where('brand_has_category_view',array("brand_id"=>$brandId));
                        return $query->result();
                }

                function getProductsByBrandIdAndCategoryId($brandId,$categoryId){
                                $query = $this->db->get_where('product_view',array("brand_id"=>$brandId,"category_id"=>$categoryId,"parent_product_id"=>0));
                                return $query->result();
                }


        }