@extends('main')

@section('title', '| edit')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!!Form::model($task,['route'=>['tasks.update', $task->id],'method'=>'PUT', 'class'=>'form-horizontal'])!!}
				
				<div class="form-group">
					{!!form::label('task', 'Task:',['class'=>'col-md-1 control-label '])!!}
					<div class="col-md-8">
						{!!form::text('task',null,['class'=>'form-control']) !!}
					</div>
					
					{!!form::submit('Save Changes',['class'=>'btn btn-success btn-sm'])!!}
					{!!Html::linkRoute('tasks.home','Cancel',[],['class'=>'btn btn-danger btn-sm']) !!}
					
				</div>
			{!!Form::close()!!}
		</div>
	</div>

@stop