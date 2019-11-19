<option serial="" value=""  > -- Mother Product -- </option>
@foreach($data as $row)
  <option  serial="{{$row->serial}}" value="{{$row->serial}}" >{{$row->title}}</option>
@endforeach


