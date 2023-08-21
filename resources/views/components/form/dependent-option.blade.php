<div class="col-md-6">
    <x-form.select label="State" attribute="state_id" class="col-form-label pt-0" required="true">
        <option value="">Select the State</option>
    </x-form.select>
</div>
<div class="col-md-6">
    <x-form.select label="City" attribute="city_id" class="col-form-label pt-0">
        <option value="">Select the City</option>
    </x-form.select>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            let selectedStateId = {{ Auth::user()->state_id ? Auth::user()->state_id : 0 }};
            let selectedCityId = {{ Auth::user()->city_id ? Auth::user()->city_id : 0 }};

            $('#input-country_id').change(function() {
                $('#input-city_id').html('<option value="" selected>Select the City</option>');
                let cid = $(this).val();
                $.ajax({
                    url: '{{ route('common.states') }}?cid=' + cid + '&_token={{ csrf_token() }}',
                    type: 'GET',
                    success: function(result) {
                        $('#input-state_id').html(
                            '<option value="" selected>Select the State</option>');
                        $.each(result.states, function(key, value) {
                            let selected = value.id == selectedStateId ? 'selected' :
                                '';
                            $('#input-state_id').append(
                                `<option value="${value.id}" ${selected}>${value.name}</option>`
                            );
                        });

                        // trigger change event to load cities
                        $('#input-state_id').change();
                    }
                });
            });

            $('#input-state_id').change(function() {
                let sid = $(this).val();

                $.ajax({
                    url: '{{ route('common.cities') }}?sid=' + sid + '&_token={{ csrf_token() }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        $('#input-city_id').html(
                            '<option value="" selected>Select the City</option>');
                        $.each(result.cities, function(key, value) {
                            $('#input-city_id').append(
                                '<option value="' + value.id + '"' +
                                (value.id == selectedCityId ? ' selected' : '') +
                                '>' + value.name + '</option>'
                            );
                        });
                    }
                });
            });
            $('#input-country_id').change();
        });
    </script>
@endpush
