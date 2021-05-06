<button class="btn btn-primary" type="button">Button</button>
@foreach ($courselist as $data){
    <tr>
        <td>{$data->courseName}</td>
        </tr>


    @endforeach
}
