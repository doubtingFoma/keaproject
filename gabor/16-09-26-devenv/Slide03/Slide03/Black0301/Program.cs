using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0301
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create the original and an empty list
            List<string> myList = new List<string> { "Peter", "Poul", "John", "Jim", "Johnny" };
            List<string> mySecondList = new List<string> { };

            // Iterate through original list
            foreach (string item in myList){
                if (item.Contains("n"))
                {
                    mySecondList.Add(item);
                }
            }

            // Iterate through new list
            foreach (string item in mySecondList)
            {
                Console.WriteLine(item);
            }
        }
    }
}
