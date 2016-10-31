using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide08_Part1.Controllers
{
    public class PostsController : Controller
    {
        public List<string> Posts { get; set; } = new List<string>();

        public PostsController()
        {
            Posts.Add("krumpli");
            Posts.Add("kukucs");
            Posts.Add("kifli");
        }


        public string Details(int id)
        {
            return Posts[id];
        }

        // GET: Posts
        public ActionResult Index()
        {            
            return Content(Details(1));
        }
    }
}