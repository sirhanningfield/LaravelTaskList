@extends('main')

@section('title','Home')

@section('styles')
	
	{{Html::style('css/styles.css')}}

@stop

@section('content')
	
	<div class="row">
		<div class="col-md-9 col-md-offset-2 spacing-up">

			{!!Form::open(['route'=>'tasks.store', 'class'=>"form-horizontal"])!!}
				
				<div class="form-group">
					{!!form::label('task', 'Task:',['class'=>'col-md-1 control-label '])!!}
					<div class="col-md-8">
						{!!form::text('task',null,['class'=>'form-control']) !!}
					</div>

					{!!form::submit('Add task',['class'=>'btn btn-success col-md-2'])!!}
				</div>
			{!!Form::close()!!}
	
		</div>
	</div> <!-- end row -->
	<div class="row">
		<div class="col-md-9 col-md-offset-2 spacing-up"> 
			<table class="table">
				<thead>
					<th>#</th>
					<th>Task</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($tasks as $task)
						<tr>
							<th>{{$task->id}}</th>
							<td>{{$task->task}}</td>
							<td>
								<div class="row">
									{!!Html::linkRoute('tasks.edit','Edit',[$task->id],['class'=>'btn btn-default btn-sm col-md-5 '])!!}
									{!!Form::open(['route'=>['tasks.destroy', $task->id],'method'=>'DELETE'])!!}
										{!!form::submit('Done',['class'=>'btn btn-danger btn-sm col-md-5 col-md-offset-1'])!!}
									{!!Form::close()!!}
								</div>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
			<div class="text-center">
				{!!$tasks->links()!!}
			</div>
		</div>
	</div> <!-- end row-->
@stop