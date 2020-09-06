<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question Name</th>
            <th scope="col">Question Body</th>
            <th class="text-center" colspan="3" scope="col"> Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
        <tr>
            <th scope="row">{{ $question->id }}</th>
            <td>{{ $question->question_name }}</td>
            <td>{{ $question->question_body }}</td>
            <td>
                <a href="{{ route('admin.questions.show', $question->id)}}">
                    <button type="button" class="btn btn-primary float-left">View</button></a> </td>


            <td> <a href="{{ route('admin.questions.edit', $question->id)}}">
                    <button type="button" class="btn btn-primary float-left">Edit</button></a></td>

            <td>
                <form action="{{ route('admin.questions.destroy',$question->id)}}" method="POST" class="float-left">
                    @csrf
                    {{ @method_field('DELETE')}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>