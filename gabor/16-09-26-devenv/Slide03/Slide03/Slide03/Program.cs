using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide03
{
    class Program
    {
        static void Main(string[] args)
        {
            // int[] myInts = { 2, 3, 4, 5 };
            // foreach (int item in myInts)
            // {
            //     Console.WriteLine(item);
            // }

            List<int> myList = new List<int> { 2, 23, 34, 45, 45 };
            foreach (var item in myList)
            {
                Console.WriteLine(item);
                if (item==2)
                {
                    Console.WriteLine("Hey its a two!");
                }
            }
        }
    }
}
