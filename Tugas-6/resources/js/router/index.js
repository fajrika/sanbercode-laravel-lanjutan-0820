import Home from "../views/Home";
import Student from "../views/Student/Index";
import Lesson from "../views/Lesson";
export default {
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/student",
            name: "pages.student",
            component: Student
        },
        {
            path: "/lesson",
            name: "pages.lesson",
            component: Lesson
        }
    ]
};
