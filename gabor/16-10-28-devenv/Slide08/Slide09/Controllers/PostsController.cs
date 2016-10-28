using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Slide09.Controllers
{
    public class PostsController : Controller
    {
        // GET: Posts
        public ActionResult Index(int id)
        {
            List<string> myPosts = new List<string>();
            myPosts.Add("myVeryPost1");
            myPosts.Add("myQuitePost2");
            myPosts.Add("myMuchPost3");

            ViewBag.myPosts = myPosts;
            return View("Index");
        }

        public ActionResult Details(int index)
        {
            List<string> myPosts = new List<string>();
            myPosts.Add("myVeryPost1");
            myPosts.Add("myQuitePost2");
            myPosts.Add("myMuchPost3");

            ViewBag.myPost = myPosts[index];
            return View("Details");
        }

        public ActionResult Create()
        {
            return View();
        }
    }
}