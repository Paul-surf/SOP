@extends('layouts.layout')
<div class="center_all">

@section('content')
    <div class="content">
        <div class="title">
        SOP Project
    </div>
    <table class="w-full">
        <thead class="bg-black">
            <tr>
                <th class="text-left px-4 py-2">ID</th>
                <th class="text-left px-4 py-2">Name</th>
                <th class="text-left px-4 py-2">Type</th>
                <th class="text-left px-4 py-2">Opgave</th>
                <th class="text-left px-4 py-2">Extra</th>
                <th colspan="2" class="text-left px-4 py-2">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr class="border-b border-t border-gray-800">
                    <td class="text-left px-4 py-2">{{ $project->id }}</td>
                    <td project-field="name" class="text-left px-4 py-2"><a href="/projects/{{ $project->id}}">{{ $project->name }}</a></td>
                    <td class="text-left px-4 py-2">{{ $project->type }}</td>
                    <td project-field="opgave" class="text-left px-4 py-2">{{ $project->opgave }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center">
                        @if($project->extra)
                            @foreach($project->extra as $extra)
                                <p class="bg-gray-900 rounded-md shadow-md text-center mr-2 px-2">{{ $extra }}</p>
                            @endforeach
                        @else
                            N/A
                        @endif
                        </div>  
                    </td>
                    <td><i class="fa fa-pencil" id="edit-project" project-id="{{ $project->id }}"></i></td>
                    <td>
                        <form class="flex items-center justify-center m-0" action="/projects/{{ $project->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!--
    @foreach($projects as $project)
     <div>
        {{ $project->name }} - {{ $project->type}} - {{ $project->opgave}}
     </div>
    @endforeach -->

</div>
</div>


<form class="hidden" method="PUT" id="project-update">
    @csrf
    @method("PUT")
    <input type="text" name="project_name" value="">
    <input type="text" name="project_opgave" value="">
</form>

<div class="absolute m-10" style="right: 0; top: 0" id="notifications">
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('body').on('click', '#edit-project', function(){
                var tdParent = $(this).parent().parent();

                $(this).replaceWith('<i class="fa fa-save" id="save-project">');

                $('#project-update').attr('project-id', $(this).attr('project-id'));

                $(tdParent).find('[project-field]').each(function(){
                    $(this).addClass('in-edit');
                    $(this).html('<input type="text" name="' + $(this).attr('project-field') + '" value="' + $(this).text() + '">');
                });
            });

            $('body').on('click', '#save-project', function(){
                $('#project-update input[name="project_name"]').attr('value', $('input[name="name"]').val());
                $('#project-update input[name="project_opgave"]').attr('value', $('input[name="opgave"]').val());

                $('#project-update').trigger('submit');
            });

            $('#project-update').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: 'PUT',
                    url: '/projects/' + $(this).attr('project-id'),
                    data: $(this).serialize(),
                    success: function(data){
                        var notification = $(`
                            <div class="${data.bgColor} rounded-md shadow-md hidden p-5">
                                ${data.message}
                            </div>
                        `);

                        $('#notifications').append(notification);

                        $(notification).fadeIn("fast");
                        setTimeout(function(){
                            $(notification).fadeOut("fast");
                        }, 1500);

                        $('td.in-edit[project-field="name"]').html('<a href="/projects/' + data.project.id + '">' + data.project.name + '</a>');
                        $('td.in-edit[project-field="opgave"]').html(data.project.opgave);

                        $('#save-project').replaceWith('<i class="fa fa-pencil" id="edit-project" project-id="' + data.project.id + '"></i>');
                    }
                });
            });
        });
    </script>
@endsection