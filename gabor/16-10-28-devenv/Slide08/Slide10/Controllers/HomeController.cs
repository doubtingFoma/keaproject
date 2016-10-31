using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide10.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            ViewBag.title = "Index";
            ViewBag.message = "Welcome to this awesome page";
            return View("Index");
        }

        //
        public ActionResult About()
        {
            ViewBag.title = "About";
            ViewBag.message = "Here you can find information about something.";
            return View("Index");
        }

        public ActionResult TestRazor()
        {
            return View("TestRazor");
        }
    }
}