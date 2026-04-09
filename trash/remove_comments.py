import os
import re

def remove_comments(code):
    # Regex to match:
    # 1. Comments: /* ... */ or // ... (with negative lookbehind for ':' to avoid http://)
    # 2. Strings: '...' or "..." (to avoid altering // or /* inside them)
    pattern = r'(?:(?<!:)//.*?$|/\*.*?\*/)|(\'(?:\\.|[^\\\'])*\'|"(?:\\.|[^\\"])*")'
    
    def replacer(match):
        # If group 1 (string) matched, return it unchanged.
        if match.group(1) is not None:
            return match.group(1)
        else:
            return ""
            
    # Apply regex for // and /* */
    code = re.sub(pattern, replacer, code, flags=re.DOTALL | re.MULTILINE)
    
    # Also remove HTML comments <!-- ... -->
    code = re.sub(r'<!--(.*?)-->', '', code, flags=re.DOTALL)
    
    return code

def main():
    root_dir = "/Users/ellometa/code/CollegeStuff/WPL"
    
    count = 0
    for dirpath, dirnames, filenames in os.walk(root_dir):
        # Exclude hidden directories
        dirnames[:] = [d for d in dirnames if not d.startswith('.')]
        
        for filename in filenames:
            ext = os.path.splitext(filename)[1].lower()
            
            # Skip python script itself, markdown, text, and hidden files
            if ext in ['.md', '.txt', '.py', '.ignore'] or filename.startswith('.'):
                continue
            
            filepath = os.path.join(dirpath, filename)
            
            # Process common source code extensions
            if ext in ['.php', '.html', '.css', '.js', '.sql', '.json', '.c', '.cpp', '.java']:
                try:
                    with open(filepath, 'r', encoding='utf-8') as f:
                        content = f.read()
                    
                    new_content = remove_comments(content)
                    
                    # Clean up multiple empty lines that might be left after removing comments
                    new_content = re.sub(r'\n\s*\n', '\n\n', new_content)
                    
                    if new_content != content:
                        with open(filepath, 'w', encoding='utf-8') as f:
                            f.write(new_content)
                        print(f"Cleaned comments: {filepath}")
                        count += 1
                except Exception as e:
                    print(f"Skipping {filepath}: {e}")
                    
    print(f"Total files cleaned: {count}")

if __name__ == "__main__":
    main()
