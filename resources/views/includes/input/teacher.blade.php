    <label for="teacher">Teacher</label>
                <select name="staff" class="form-control" id="">
                <option value=""selected>Choose Staff</option>
                    @foreach($staff as $staff)
                <option value="{{$staff->id}}">{{$staff->fullName}}</option>
                @endforeach
                </select>