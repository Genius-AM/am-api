<template>
 <div>
     <nav class="navbar navbar-expand-lg bg-light" style="color: rgb(180, 180, 180)">
             <div class="container" >
                 <div class="navbar-nav">
                     <router-link class="nav-link nav-item" :to="{name: 'desks'}" style="color: rgb(90, 90, 90)" >Доски</router-link>
                 </div>
             </div>
     </nav>
     <div>
         <router-view></router-view>
     </div>
 </div>
</template>

<script>
export default {

}
</script>

