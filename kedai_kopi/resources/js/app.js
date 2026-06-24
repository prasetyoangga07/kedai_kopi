import "./bootstrap";
import dashboard from "./admin/dashboard";
import product from "./admin/product";
import toast from "./admin/toast";
import customer from "./admin/customer";
import user from "./admin/user";
import role from "./admin/role";
import loyalty from "./admin/loyalty";
import adminTrx from "./admin/transaction";

import transaction from "./customer/transaction";

import AOS from "aos";
import "aos/dist/aos.css";
import Alpine from "alpinejs";

import Swal from "sweetalert2";
window.Swal = Swal;

window.Alpine = Alpine;

// admin Js
Alpine.data("dashboardJs", dashboard);
Alpine.data("toast", toast);
Alpine.data("productJs", product);
Alpine.data("customerJs", customer);
Alpine.data("usersJs", user);
Alpine.data("rolesJs", role);
Alpine.data("loyaltyJs", loyalty);
Alpine.data("adminTrxJs", adminTrx);

// customer Js
Alpine.data("transactionJs", transaction);

Alpine.start();
AOS.init();
