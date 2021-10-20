<?php
class Todo extends CI_Controller {

    public function index(){
        $data['main']='home_view';
        $this->load->view('templates/todo-list',$data);
    }

    public function add(){
        $data['main']='home_view';
        $this->load->view('templates/todo-add',$data);
    }

    public function edit(){
        $data['main']='home_view';
        $this->load->view('templates/todo-edit',$data);
    }


    public function getlist(){
        $this->load->model('TodoModel');  
        $data=$this->TodoModel->select();  
        echo json_encode($data); 
    }

   public function editapi(){
       if($this->input->server('REQUEST_METHOD') === 'GET'){
         
            $this->load->model('TodoModel');  
            $data=$this->TodoModel-> getbyid($this->input->get('id'));  
            echo json_encode($data); 
       }
       else{

        $data = array(
            'title' => $this->input->post('title'),
            'description'=>$this->input->post('description'),
            'date'=>$this->input->post('date')
                );

        $this->load->model('TodoModel');
        $result=$this->TodoModel->setbyid($this->input->post('id'),$data);
        if($result)
        {
                 echo  1;	
        }
        else
        {
                 echo  0;	
        }
           
       }
   }
  
   public function delete(){
    $this->load->model('TodoModel');  
    $data=$this->TodoModel-> deletebyid($this->input->post('id'));  
   
    if($data){
        echo 1;
    }
    else{
     echo 0;
    }

   }

    public function savedata()
    {        
     $data = array(
     'title' => $this->input->post('title'),
     'description'=>$this->input->post('description'),
     'date'=>$this->input->post('date')
         );
         
         $this->load->model('TodoModel');
        $result=$this->TodoModel->saveData($data);
         if($result)
         {
         echo  1;	
         }
         else
         {
         echo  0;	
         }
     }
   
    }
?>