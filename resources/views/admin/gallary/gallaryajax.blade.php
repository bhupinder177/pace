<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%">S. No</th>
            <th style="width: 10%">Image</th>
            <th style="width: 10%">Status</th>
            <th style="width: 8%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(count($allData) != 0) {
            ?>
            @foreach($allData as $u)
                <tr class="data">
                    <td>{{ ++$srNo }}</td>
                    <td>
                        <img src="{{url('storage/gallary/'.$u->image)}}" width="100px;" />
                    </td>
                    <td>
                        @if($u->status == 1)
                            Active
                        @else
                            In-Active
                        @endif
                    </td>
                    <td >
                        <a href="{{route('gallary.edit', ['id' => Crypt::encrypt($u->id)])}}"><i class="fa fa-edit"></i></a>
                        <a class="deleterecord" data-link="{{route('gallary.delete')}}" data-id="{{$u->id}}"><i class="fa fa-trash deleterecord"  data-link="{{route('gallary.delete')}}"  data-id="{{$u->id}}" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            <?php
        } else {
            ?>
                <tr><td colspan="4"><center>No Record Found</center></td></tr>
            <?php
        } ?>
    </tbody>
</table>
<div class="pagination1">
    {{$allData->links()}}
</div>
