import "./bootstrap";
import layout from "./alpine/layout";
import product from "./alpine/product";
import toast from "./alpine/toast";
import customer from "./alpine/customer";
import user from "./alpine/user";
import role from "./alpine/role";

import AOS from "aos";
import "aos/dist/aos.css";
import Alpine from "alpinejs";

import Swal from "sweetalert2";
window.Swal = Swal;

window.Alpine = Alpine;

Alpine.data("layoutJs", layout);
Alpine.data("toast", toast);
Alpine.data("productJs", product);
Alpine.data("customerJs", customer);
Alpine.data("usersJs", user);
Alpine.data("rolesJs", role);

Alpine.start();
AOS.init();
