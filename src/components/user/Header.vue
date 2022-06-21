<template>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item space">
                        <a href="{{route('index')}}"> <b>Home</b> </a>
                    </li>
                    <li class="nav-item space">
                        <a href="{{route('chef.cheflist')}}"> <b>Chef</b> </a>
                    </li>
                    <li class="nav-item space">
                        <a href="#Experience"> <b>Package</b> </a>
                    </li>
                    <li>
                        <a href="{{route('index')}}">
                            <img class="logo" src="picture/chef-icon.svg.png" alt="">
                        </a>
                    </li>
                    <li class="space">
                        <a href="{{route('login')}}"> <b>login</b> </a>
                    </li>
                    <li class="space">
                        <a href="#Contact"> <b>Blog</b> </a>
                    </li>
                    <li class="nav-item space">
                        <a href="#Contact"> <b>About</b> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</template>

<script>
export default {
    name: 'MySidebar',
    props: ['isActive']
};
</script>
<style lang='' scoped>
</style>