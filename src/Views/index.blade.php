@extends('taskmanager::layout')
@section('content')
<div class="jumbotron" style="border-radius: 0">
	<div class="container">

		<h1><a href="{{ url('/tasks')}}">Task Manager</a></h1>
		<p>A laravel package that adds task management functionality to your app.</p>
		<p>
			<!-- <a class="btn btn-primary btn-lg">Learn more</a> -->
		</p>
	</div>
</div>
<div class="container">
<div class="row">
            <div class="col-sm-4">
                <div class="animated fadeInUp">

                    <div class="ibox">
                    
                        <div class="ibox-title">
                            <h5>Task Categories</h5>
                          

                        </div>

                         
                                
                        <div class="ibox-content">

                             

                            <div class="project-list">
                            <div class="row">
                                <div class="col-md-12">
                                <form id="new-category" method="post" action="{{url('tasks/category/add') }}">
                                <!-- {{ csrf_field() }} -->
                                    <div class="input-group">
                                    <input type="text" name="category" placeholder="New Category" class="input-sm form-control"> 
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">	
                                        <i class="fa fa-plus"></i>
                              Add Category</button> 
                              </span>
                              </div>
								</form>
                                </div>
                                </div>
                                
                              
                                <div class="modal inmodal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Edit Category</h4>
                                        </div>
                                         <form id="new-category" method="post" action="{{url('tasks/category/update') }}">
                                <!-- {{ csrf_field() }} -->
                                        <div id="edit-category-form" class="modal-body">
                                          
                                    
                                      
                              
								
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                                
								@if(count($categories) >0)
                                <table class="table table-hover table-striped">
                                           <tbody>
                                @foreach($categories as $category)
                                	
                    

                                <tr>
                                      
                                        <td class="project-title">
                                            <a href="{{url('tasks?category='.$category->slug)}}">{{$category->name}} 
                                            <br>
                                            <span class="text-muted" style="font-size: 0.6em">Created {{ $category->created_at}}</span>
                                            </a>
                                        </td>
                                        <td><span class="badge badge-primary">{{count($category->tasks)}}</span></td>
                                   
                                        <td class="project-actions" width="40%">
                                            
                                            <button type="button" onclick="updateInput('{{ $category->name }}','{{ $category->id }}')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCategoryModal"><i class="fa fa-pencil"></i></button>
                                            <a href="{{url('tasks/category/delete/'.$category->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  </a>
                                        </td>
                                    </tr>
                                   
                                     @endforeach
                                      </tbody>
                                </table>
                                @else

                                <p class="text-muted text-center"> No categories found. </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

   <div class="col-md-8">
<div class="ibox-content" style="min-height: 200px">
@if(isset($taskCategory))
                        <h2 style="border-bottom: 1px dotted #ccc; border-bottom: 10px;">{{$taskCategory->name}} <span class="badge badge-success">{{count($tasks)}}</span></h2>
                       
                        <div class="row">
                        <div class="col-md-12">
                          <form id="new-task" method="post" action="{{url('tasks/add') }}">
                          <input type="hidden" name="category_id" value="{{$taskCategory->id}}" class="input-sm form-control">
                                    <div class="input-group">
                                    <input type="text" name="title" placeholder="New Task" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">	<i class="fa fa-plus"></i>
                                </a> Add Task</button> </span></div>
                                </div>
                           </form>
                        </div>
                        @if(count($tasks) > 0)
                        <ul class="todo-list m-t ui-sortable">
                     
                        @foreach($tasks as $task)
                    
                            <li>
                                <a onclick="toggleStatus('{{$task->id}}')" href="#" class="check-link"><i class="fa {{$task->completed? 'fa-check-square':'fa-square-o'}}"></i> </a>
                                <span class="m-l-xs {{$task->completed? 'todo-completed':''}}">{{$task->title}}</span>
                                <span class="pull-right"><a href="{{url('tasks/delete/'.$task->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  </a>
                                 </span>
                             </li>
                          
                            @endforeach
                        
                        </ul>
                        @else
								<p class="text-center text-muted">No tasks added yet</h4>
								@endif

                        @else

                        <h4 class="text-center text-muted">Select Category to view tasks</h4>
@endif

                    </div>
                    </div>
                    </div>
                    </div>

                    <script>
                    	function updateInput(name,id){
                    		console.log(name);
                    		$('#edit-category-form').html('<input type="hidden" name="category_id" value="'+ id +'"><div class="input-group"><input type="text" id="category-name" value="'+ name +'" name="category" placeholder="New Category" class="input-lg form-control"><span class="input-group-btn"></span></div>')
                    	}

                    	function toggleStatus(task_id)
                    	{
                    		console.log(task_id);
                    		 $.ajax({
							        url: "{{url('tasks/update/status')}}",
							        type: "post",
							        data: {'task_id':task_id},
							        success: function (response) {
							        	console.log(response);
							        	location.reload();
							           // you will get response from your php page (what you echo or print)                 

							        },
							        error: function(jqXHR, textStatus, errorThrown) {
							           console.log(textStatus, errorThrown);
							        }


							    });
                    	}
                    </script>
@endsection
