import './bootstrap';

import Alpine from "alpinejs";
import curriculumBuilder from "./components/curriculumBuilder.js";

window.Alpine = Alpine;
window.curriculumBuilder = curriculumBuilder;

Alpine.start();
