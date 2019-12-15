<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Phone</title>

    <style>
        table {
            border-collapse: collapse;
        }
        table th, table td{
            border-collapse: collapse;
            border:1px solid black;
        }
    </style>
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

            <br><br>

            <form action="">
                <div>
                    <label>
                        Type :
                        <select v-model="search.type">
                            <option value="1">By Name</option>
                            <option value="2">By Location</option>
                            <option value="3">By Current Location</option>
                        </select>
                    </label>
                </div>
                <div v-if="search.type == 1">
                    <div>
                        <label>
                            Product Name :
                            <input v-model="search.name">
                        </label>
                    </div>
                </div>
                <div v-if="search.type == 2">
                    <div>
                        <label>
                            Location :
                            <select v-model="search.division">
                                <template v-if="search_crit.divisions">
                                    <option v-for="division in search_crit.divisions" :value="division.id" @click="getSearchCities(division.id)">@{{division.name}}</option>
                                </template>
                            </select>
                            <select v-model="search.city">
                                <template v-if="search_crit.cities">
                                    <option v-for="city in search_crit.cities" :value="city.id" @click="getSearchTownship(city.id)">@{{city.name}}</option>
                                </template>
                            </select>
                            <select v-model="search.township">
                                <template v-if="search_crit.townships">
                                    <option v-for="township in search_crit.townships" :value="township.id">@{{township.name}}</option>
                                </template>
                            </select>
                        </label>
                    </div>
                </div> 
                <div>
                    <button type="button" @click="searchProduct">Search</button>
                </div>               
            </form>       
            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Categories</th>
                            <th>Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="search.result" v-for="result in search.result">
                            <td>@{{result.id}}</td>
                            <td>@{{result.name}}</td>
                            <td>@{{result.description}}</td>
                            <td>@{{result.price}}</td>
                            <td>
                                <template v-if="result.categories" v-for="category in result.categories">
                                    <template>@{{category.name}}<br></template>
                                </template>
                            </td>
                            <td>
                                <template v-if="result.tags" v-for="tag in result.tags">
                                    <template>@{{tag.name}}<br></template>
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>     
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
                search: {
                    type: 1,
                    name: null,
                    division: null,
                    city: null,
                    township: null,
                    result: [],
                    device: {}
                },
                search_crit: {
                    divisions: [],
                    cities: [],
                    townships: [],  
                },
                routes: {
                    get_location_data : "{{route('client.get_location_data')}}",
                    store_info : "{{route('client.store_info')}}",
                    search : "{{route('api.product.search')}}",
                }
            },
            mounted: function(){
                this.startup();
            },
            methods:{
                startup(){
                    this.sendInfo();
                    this.$http.post(this.routes.get_location_data,{type: "division"}).then(res => {
                        this.divisions = res.data.data;
                        this.search_crit.divisions = res.data.data;
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
                        this.search.device = this.device;
                    })
                },
                searchProduct(){
                    this.$http.post(this.routes.search,this.search).then(res => {
                        this.search.result = res.data.data;
                    })
                },
                getSearchCities(id){
                    this.search.city = null;
                    this.search.township = null;
                    this.search_crit.townships = [];
                    this.$http.post(this.routes.get_location_data,{type: "city", id: id}).then(res => {
                        this.search_crit.cities =  res.data.data;
                    });
                },
                getSearchTownship(id){
                    this.search.township = null;
                    this.$http.post(this.routes.get_location_data,{type: "township", id: id}).then(res => {
                        this.search_crit.townships =  res.data.data;
                    });
                },
            }
        });
    </script>
</body>
</html>