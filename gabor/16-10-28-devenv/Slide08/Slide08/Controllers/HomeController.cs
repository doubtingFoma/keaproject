using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide08.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            return Content("name-of-index");
        }

        public ActionResult About()
        {
            return Content("name-of-about");
        }

        public ActionResult Contact()
        {
            return Content("name-of-contact");
        }
    }
}