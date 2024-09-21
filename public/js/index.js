import { DOMManipulator } from "./domManipulator";

const domManiupulator = new DOMManipulator();

const html = "<span>02</span><span>Feb</span>";

domManiupulator.insertHTMLById("tasks-date", html);
