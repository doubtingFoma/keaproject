using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide09.Controllers
{
    public class HomeController : Controller
    {
        //Methods are now called actions. Deal with it
        // GET: Home
        public ActionResult Index()
        {
            return View();            
        }

        public ActionResult About()
        {
            return Content("About kukucs");
        }
        public ActionResult Contact()
        {
            return Content("Contact kukucs");
        }
        public ActionResult TestRazor()
        {
            return View();
        }

        public ActionResult myPartialView()
        {
            return PartialView("MyPartialView");
        }

        public ActionResult CurrentDate()
        {
            //DateTime CurrentDate = new DateTime();
            return Content(DateTime.Now.ToString());
        }
    }
}