using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide08_Part1.Controllers
{
    public class HomeController : Controller
    {
        //Methods are now called actions. Deal with it
        // GET: Home
        public ActionResult Index()
        {
            return Content("Index of kukucs");
        }

        public ActionResult About()
        {
            return Content("About kukucs");
        }
        public ActionResult Contact()
        {
            return Content("Contact kukucs");
        }

    }
}