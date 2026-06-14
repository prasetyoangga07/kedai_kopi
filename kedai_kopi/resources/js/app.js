import "./bootstrap";
import product from "./alpine/product";
import toast from "./alpine/toast";

import AOS from "aos";
import "aos/dist/aos.css";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data('toast', toast);
Alpine.data('productJs', product);

Alpine.start();
AOS.init();
