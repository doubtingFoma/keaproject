using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide05
{
    class Program
    {
        static void Main(string[] args)
        {
            Person p1 = new Person();
            Person p2 = new Person();
            p1.age = 22;
            p1.name = "Peter";
            p2.age = 33;
            p2.name = "Bobo";

            Console.WriteLine(p1.age);
            Console.WriteLine(p2.age);
        }
    }
}
