<!-- <script
	src="https://kit.fontawesome.com/d689969a25.js"
	crossorigin="anonymous"
></script> -->
<template>
	<div id="app">
		<nav class="navbar navbar-expand navbar-dark bg-dark">
			<router-link to="/" class="navbar-brand">bezKoder</router-link>
			<div class="navbar-nav mr-auto">
				<li class="nav-item">
					<router-link to="/home" class="nav-link">Tutorials</router-link>
				</li>
			</div>
		</nav>

		<div class="container mt-3">
			<router-view />
		</div>
	</div>
</template>

<script>
import Nav from "./components/Nav.vue";
export default {
	created() {},
	name: "app",
	components: {
		Nav,
	},
};
</script>
