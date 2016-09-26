using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_03
{
    class Program
    {
        static void Main(string[] args)
        {
            //create an array that contains the names
            string[] People = {"Peter", "Paul", "John", "Jim", "Johnny"};
            //create a list (a dymanic array) that will contain the names we look for
            List<string> Found = new List<string>();
            //this is the string we look for in the names
            string findThisString = "n";

            //we iterate through every element of the people array
            for (int i = 0; i < People.Length; i++)
            {
                //IndexOf() function returns the position of the found string. If it didnt's find anything, will return -1
                if (People[i].IndexOf(findThisString) > -1 )
                {
                    //we add the element that contains the string we look for
                    Found.Add(People[i]);
                }
            }

            //we write the result in the console
            for (int i = 0; i < Found.Count; i++)
            {
                Console.WriteLine(Found[i]);
            }

            Console.ReadKey();
        }
    }
}
