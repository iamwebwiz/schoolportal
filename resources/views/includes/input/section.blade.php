<label for="section">School Section</label>
                <select name="section" class="form-control" id="">
                <option value=""selected>Choose Section</option>
                @foreach($sections as $section)
                <option value="{{$section->id}}">{{$section->name}}</option>
                @endforeach
                </select>