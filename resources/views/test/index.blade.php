<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Phone</title>
</head>
<body>

    <div id="app">
        <h1>@{{app_name}}</h1>

        <div>
            <form action="">
                <div>
                    <label>
                        Platform :
                        <select v-model="device.platform">
                            <option value="android">Android</option>
                            <option value="ios">IOS</option>
                        </select>
                    </label>
                </div>
                <div>
                    <label>
                        Device Id : 
                        <input v-model="device.id"> <button type="button" @click="genRandom">Random Id</button>
                    </label>
                </div>
                <div>
                    <label>
                        Device Id : 
                        <input v-model="device.ip"> <button type="button" @click="genRandomIp">Random IP</button>
                    </label>
                </div>
                <div>
                    <label>
                        Location : 
                        <select v-model="device.location.division">
                            <template v-if="divisions">
                                <option v-for="division in divisions" :value="division.id" @click="getCities(division.id)">@{{division.name}}</option>
                            </template>
                        </select>
                        <select v-model="device.location.city">
                            <template v-if="cities">
                                <option v-for="city in cities" :value="city.id" @click="getTownship(city.id)">@{{city.name}}</option>
                            </template>
                        </select>
                        <select v-model="device.location.township">
                            <template v-if="townships">
                                <option v-for="township in townships" :value="township.id">@{{township.name}}</option>
                            </template>
                        </select>
                    </label>
                </div>
                <div>
                    <button type="button" @click="sendInfo">Send Info</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = "{{csrf_token()}}";
        var app = new Vue({
            el: "#app",
            data: {
                app_name: "Test Phone",
                divisions: [],
                cities: [],
                townships: [],                
                device: {
                    id: Math.floor(100000000 + Math.random() * 900000000),
                    platform: "android",
                    ip: "{{request()->ip()}}",
                    location: {
                        division: "",
                        city: "",
                        township: ""
                    }
                },
                routes: {
                    get_location_data : "{{route('client.get_location_data')}}",
                    store_info : "{{route('client.store_info')}}",
                }
            },
            mounted: function(){
                this.startup();
            },
            methods:{
                startup(){
                    this.sendInfo();
                    this.$http.post(this.routes.get_location_data,{type: "division"}).then(res => {
                        this.divisions =  res.data.data;
                    });
                },
                genRandom(){
                    this.device.id = Math.floor(100000000 + Math.random() * 900000000);
                },
                genRandomIp(){
                    this.device.ip = (Math.floor(Math.random() * 255) + 1)+"."+(Math.floor(Math.random() * 255) + 0)+"."+(Math.floor(Math.random() * 255) + 0)+"."+(Math.floor(Math.random() * 255) + 0);
                },
                getCities(id){
                    this.townships = [];
                    this.$http.post(this.routes.get_location_data,{type: "city", id: id}).then(res => {
                        this.cities =  res.data.data;
                    });
                },
                getTownship(id){
                    this.$http.post(this.routes.get_location_data,{type: "township", id: id}).then(res => {
                        this.townships =  res.data.data;
                    });
                },
                sendInfo(){
                    this.$http.post(this.routes.store_info,this.device).then(res => {
                    })
                }
            }
        });
    </script>
</body>
</html>