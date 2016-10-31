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
        public ActionResult Index()
        {
            ViewBag.title = "Index action";
            this.SessionHelper();
            ViewBag.myPosts = Session["posts"];
            return View("Index");
        }

        public ActionResult Details(int id)
        {
            List<string> myPosts = new List<string>();
            myPosts.Add("myVeryPost1");
            myPosts.Add("myQuitePost2");
            myPosts.Add("myMuchPost3");

            ViewBag.myPost = myPosts[id];
            return View("Details");
        }

        [HttpGet]
        public ActionResult Create()
        {
            ViewBag.title = "HttpGet Create action";
            this.SessionHelper();
            ViewBag.myPosts = Session["posts"];
            return View("Index");
        }

        [HttpPost]
        public ActionResult Create(string posttitle)
        {
            //return RedirectToAction("Index");
            List<string> myPosts = new List<string>();
            myPosts = (List<string>)Session["posts"];
            myPosts.Add(posttitle);
            Session["posts"] = myPosts;
            return RedirectToAction("Index");
        }

        public void SessionHelper()
        {
            if (Session["posts"] == null)
            {
                // Create list of posts
                List<string> myPosts = new List<string>();
                myPosts.Add("myVeryPost1");
                myPosts.Add("myQuitePost2");
                myPosts.Add("myMuchPost3");

                // Assign list of posts to viewbag and session
                Session["posts"] = myPosts;
            }
            else
            {
                // What should I do?
            }

        }
    }
}