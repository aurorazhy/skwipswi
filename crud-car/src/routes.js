import { createWebHistory, createRouter } from "vue-router";

import Home from "./views/Home.vue";
import Saved from "./views/Saved.vue";

const routes = [
	{
		path: "/",
		name: "home",
		component: Home,
	},
	{
		path: "/saved",
		name: "saved",
		component: Saved,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;
