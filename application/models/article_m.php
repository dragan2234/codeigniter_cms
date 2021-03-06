<?php  

/**
* 
*/
class Article_m extends MY_Model
{
	

 	protected	$_table_name = 'articles';
 	protected	$_timestamps = TRUE;
 	protected	$_order_by = 'pubdate desc, id desc';
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exact_length[10]'
		), 
			'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]'
		), 
			'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title'
		), 
			'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		), 	
	
	);








		public function get_new(){
			$article = new stdClass();
			$article->title = '';
			$article->slug = '';
			$article->body = '';
			$article->pubdate = date('Y-m-d');
			return $article;

		}


		public function set_published(){
			$this->db->where('pubdate <=', date('Y-m-d'));

		}

		public function get_recent($limit = 3){
			$limit = (int) $limit;
			$this->set_published();
			$this->db->limit($limit);
			return parent::get();
		}

		
}