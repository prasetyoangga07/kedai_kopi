import "./bootstrap";
import product from "./alpine/product";
import toast from "./alpine/toast";
import customer from "./alpine/customer";

import AOS from "aos";
import "aos/dist/aos.css";
import Alpine from "alpinejs";

import Swal from "sweetalert2";
window.Swal = Swal;

window.Alpine = Alpine;

Alpine.data("toast", toast);
Alpine.data("productJs", product);
Alpine.data("customerJs", customer);

Alpine.start();
AOS.init();
