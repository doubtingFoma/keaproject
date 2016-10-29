using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_03_02
{
    class Program
    {
        static void Main(string[] args)
        {
            List<string> myList = new List<string> { "john", "", "peter", null, null, "jim", null };

            //just list the original array to see where the empty lines are
            for (int i = 0; i < myList.Count; i++)
            {
                Console.WriteLine(myList[i]); 
            }

            Console.WriteLine("------");

            //we first remove all the null items
            myList.RemoveAll(i => i == null);
            //Then remove the empty strings
            myList.RemoveAll(i => i == "");

            //we list the new array without the nulls and empty strings
            for (int i = 0; i < myList.Count; i++)
            {
                Console.WriteLine(myList[i]);
            }

            //wait for a key to prevent program close
            Console.ReadKey();

        }
    }
}
