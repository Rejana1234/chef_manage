<template>
    <div id="dashboard">

        <div class="body">
            <div class="container">
                <div class="header">
                    <!-- <img src="../../assets/chef_logo.jpg" class="logo">
                    <nav>
                        <ul>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </nav> -->
                    <button class="btn" id="btn1"><a href="login">Log In</a></button>
                </div>
                <div class="content">
                    <div class="text">
                        <h1>Chef MAnagement System<br> <span></span></h1>
                    </div>
                    <!-- <div class="BG">
                        <img src="../../assets/chef_bg.jpg" alt="">
                    </div> -->
                </div>
            </div>

        </div>
    </div>
</template>

<script>

</script>

<style>



.container {
    height: 100vh;
    width: 100%;
    background-position: center;
    background-image: url(../../assets/chef_bg.jpg);
    background-size: cover;
    padding-right: 3%;
    padding-left: 5%;
    box-sizing: border-box;
    position: relative;
}

.header {
    width: 100%;
    height: 15vh;
    margin: auto;
    display: flex;
    align-items: center;
}

.logo {
    width: 80px;
    margin-top: 10px;
    cursor: pointer;
}

nav {
    
    flex: 1;
    padding-left: 450px;
}

nav ul li {
    display: inline-block;
    list-style: none;
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 600;
}

#btn1 {
    
    text-transform: uppercase;
    background: linear-gradient(to bottom, #ecf1f5 3%, #f5f7f9 100%);
    border-radius: 30px;
    border: 1px solid #141414;
    cursor: pointer;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 17px;
    font-weight: 700;
    padding: 12px 20px;
    margin-left: 90%;
    text-decoration: none;
    box-shadow: 1px 4px 12px rgba(94, 28, 68, .15);
    text-shadow: 0px 1px 0px #e8ebee;
}



.btn:hover {
    box-shadow: 3px 8px 22px rgba(94, 28, 68, .15);
    transform: scale(1.1);
    transition: .2s ease-in-out;
}

.content {
    position: relative;
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}

.content .text {
    position: relative;
    display:flex;
    max-width: 600px;
}

.content .text h1 {
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    font-weight: 800;
    margin-top: 30%;
    margin-left: 170%;
    line-height: 1.5em;
    letter-spacing: .1em;
    font-size: 40px;
    color: rgb(64, 63, 63);
}

.content .text h1 span {
    font-size: 50px;
}

.content .text p {
    font-size: 17px;
    font-weight: 600;
    letter-spacing: .1em;
    margin-top: 40px;
    color: #e7e3e3;
}

.btn3 {
    background: linear-gradient(to bottom, #cbcbcb 2%, #fff 100%);
    margin-top: 60px;
    margin-left: 140px;
    padding: 15px 30px;
    text-align: center;
    transition: .5s;
    border: none;
    outline: none;
    text-transform: uppercase;
    color: #1b1b1b;
    font-size: 20px;
    font-weight: 700;
    border-radius: 30px;
    box-shadow: 1px 4px 12px rgba(94, 28, 68, .15);
}

.pepsi {
    display: flex;
    height: 100%;
    position: absolute;
    width: 600px;
    margin-top: 80px;
    padding-left: 440px;
    justify-content: flex-end;
}
img {
    display:flex;
    width: 100%;
}

</style>
