using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0302
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create list, use lambda expression to remove nulls and empty strings
            List<string> myLIst = new List<string> { "john", "", "peter", null, null, "jim", null };
           // List<string> myNewList = myLIst.Where(item => item != null && item != "").ToList();
            List<string> myNewList = myLIst.Where(item => !string.IsNullOrEmpty(item)).ToList();

            // Output new list elements
            foreach (var item in myNewList)
            {
                Console.WriteLine(item);
            }


        }
    }
}
