<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {
	
		public function index()
		{
			show_view('product/home');
		}
	
	
        public function product_by_id($id){
                $this->load->model('product_model', 'mProduct');
                $data['products'] = $this->mProduct->getProductsByParentId($id);
                $data['product'] = $this->mProduct->getProductById($id);
                if($data['products']!=null && count($data['products']))
                         show_view('product/home',$data);
                else
                         show_view('product/home',$data);

        }



        public function products_by_brand_and_category($brandId,$categoryId)
        {
                $this->load->model('product_model', 'mProduct');
                $data['products'] = $this->mProduct->getProductsByBrandIdAndCategoryId($brandId,$categoryId);
                show_view('product/home',$data);
        }

}