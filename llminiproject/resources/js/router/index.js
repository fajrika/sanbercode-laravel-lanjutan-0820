export default {
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("../views/other/Home")
        },
        {
            path: "/about",
            name: "pages.about",
            component: () => import("../views/other/About")
        },
        {
            path: "/contact",
            name: "pages.contact",
            component: () => import("../views/other/Contact")
        },
        {
            path: "/category/index",
            name: "category.index",
            component: () => import("../views/category/Index")
        },
        {
            path: "/category/create",
            name: "category.create",
            component: () => import("../views/category/Create")
        },
        {
            path: "/category/:category/show",
            name: "category.show",
            component: () => import("../views/category/Show")
        },
        {
            path: "/category/:category/edit",
            name: "category.edit",
            component: () => import("../views/category/Edit")
        },
        {
            path: "/product/index",
            name: "product.index",
            component: () => import("../views/product/Index")
        },
        {
            path: "/product/create",
            name: "product.create",
            component: () => import("../views/product/Create")
        },
        {
            path: "/product/:product/show",
            name: "product.show",
            component: () => import("../views/product/Show")
        },
        {
            path: "/product/:product/edit",
            name: "product.edit",
            component: () => import("../views/product/Edit")
        },
        {
            path: "/order/create",
            name: "order.create",
            component: () => import("../views/order/Create")
        },
        {
            path: "/auth/login",
            name: "auth.login",
            component: () => import("../views/auth/Login")
        }
    ]
};
