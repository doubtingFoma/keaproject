using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_03_04
{
    class Program
    {
        static void Main(string[] args)
        {
            //create an list with numbers
            List<int> Numbers = new List<int> { 3, 7, 3, -1, 2, 3, 7, 2, 15, 15 };
            //create a list with more numbers
            List<int> MoreNumbers = new List<int> { -5, 15, 2, -1, 7, 15, 36 };
            
            //Create a variable that will hold the items that appear in both lists
            var FilteredNumbers = Numbers.Intersect(MoreNumbers);
            
            //output the results
            foreach (int item in FilteredNumbers)
            {
                Console.Write($"{item}  ");
            }

            //get a key for I don't know. Christmas present maybe.
            Console.ReadKey();


        }
    }
}
