<div class="card">
    <div class="body table-responsive">
        <table class="table " id="myTable">
            <thead>
            <tr>
                <th>Translations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($skills as $data)
                <tr>
                    <td>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <form class="" action="{{route('translation.update', $data->id)}}" method="POST" id="skill-updated">
                                    @csrf
                                    @method('PUT')
                                    <textarea type="text" class="col-5"  readonly>{{$data->key}}</textarea>
                                    <textarea name="value"  type="text" class="col-6" >{{$data->value}}</textarea>
                                    <button type="button" data-csrf-token="{{ csrf_token() }}" {{$data->title}} onclick="updateDelete(this)" class="btn btn-primary updated col-2">
                                        Update
                                        <span class="spinner"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    textarea{
        height: 100px !important;
    }
</style>
@if(count($skills) == 0)
    NO SKILLS FOUNDS
@endif
