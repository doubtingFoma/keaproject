using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0304
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create 2 lists of integers
            // List<int> myIntList = new List<int> { 1, 2, 3, 4, 5, 6 };
            // List<int> myIntList2 = new List<int> { 2, 2, 4, 4, 6, 8 };

            List<int> myIntList = new List<int> { 3, 7, 3, -1, 2, 3, 7, 2, 15, 15 };
            List<int> myIntList2 = new List<int> { -5, 15, 2, -1, 7, 15, 36 };

            List<int> lostAndFound = new List<int> {  };

            int counter = 0;

            foreach (var i in myIntList)
            {
                int currentOriginalInt = i;
                foreach (var j in myIntList2)
                {
                    if (currentOriginalInt == j && !lostAndFound.Contains(currentOriginalInt))
                        {
                        counter++;
                        lostAndFound.Add(currentOriginalInt);
                        //Console.WriteLine(currentOriginalInt);
                        break;
                    }
                    
                }
            }

            Console.WriteLine($"Number of integers appear in both lists: {counter}");
        }
    }
}
