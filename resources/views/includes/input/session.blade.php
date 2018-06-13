<label for="session">Session</label>
                <select name="session" class="form-control" id="">
                <option value=""selected>Choose Session</option>
                @foreach($sessions as $session)
                <option value="{{$session->id}}">{{$session->session}}</option>
                @endforeach
                </select>